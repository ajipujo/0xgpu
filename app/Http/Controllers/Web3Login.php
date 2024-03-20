<?php

namespace App\Http\Controllers;

use App\Models\User;
use Elliptic\EC;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use kornrunner\Keccak;

class Web3Login
{
    public function generateRandomUsername($prefix = 'user', $suffixLength = 4) {
        // Generate a random number
        $randomNumber = mt_rand(1000, 9999);

        // Generate a random suffix
        $characters = 'abcdefghijklmnopqrstuvwxyz';
        $randomSuffix = '';
        for ($i = 0; $i < $suffixLength; $i++) {
            $randomSuffix .= $characters[mt_rand(0, strlen($characters) - 1)];
        }

        // Combine prefix, random number, and suffix to create the username
        $username = $prefix . $randomNumber . $randomSuffix;

        return $username;
    }

    public function message(): string
    {
        $nonce = Str::random();
        $message = "Sign this message to confirm you own this wallet address. This action will not cost any gas fees.\n\nNonce: " . $nonce;

        session()->put('sign_message', $message);

        return $message;
    }

    public function verify(Request $request): string
    {
        $sign_message = session()->pull('sign_message');
        $signature = $request->input('signature');
        $address = $request->input('address');

        $result = $this->verifySignature($sign_message, $signature, $address);
        if ($result) {
            $availability = User::all();
            $name = $this->generateRandomUsername();
            $curtime = date("Y-m-d H:i:s");
            $role = count($availability) < 1 ? 'Admin' : 'Guest';

            $user = User::firstOrCreate(['eth_address' => $address], [
                'name' => $name,
                'email' => $name . "@0xgpu.io",
                'password' => Hash::make("12345678"),
                'role' => $role,
                'email_verified_at' => $curtime,
            ]);

            Auth::login($user);

            return ($user->role);
        } else {
            return ("Invalid Signature");
        }
    }

    protected function verifySignature(string $message, string $signature, string $address): bool
    {
        $hash = Keccak::hash(sprintf("\x19Ethereum Signed Message:\n%s%s", strlen($message), $message), 256);
        $sign = [
            'r' => substr($signature, 2, 64),
            's' => substr($signature, 66, 64),
        ];
        $recid = ord(hex2bin(substr($signature, 130, 2))) - 27;

        if ($recid != ($recid & 1)) {
            return false;
        }

        $pubkey = (new EC('secp256k1'))->recoverPubKey($hash, $sign, $recid);
        $derived_address = '0x' . substr(Keccak::hash(substr(hex2bin($pubkey->encode('hex')), 1), 256), 24);

        return (Str::lower($address) === $derived_address);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/clouds');
    }
}
