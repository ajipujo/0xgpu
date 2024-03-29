async function web3Login() {
    if (!window.ethereum) {
        window.open("https://metamask.io/download/", "_blank");
        return;
    }

    const provider = new ethers.providers.Web3Provider(window.ethereum);

    let response = await fetch("/web3-login-message");
    const message = await response.text();

    await provider.send("eth_requestAccounts", []);
    const address = await provider.getSigner().getAddress();
    const signature = await provider.getSigner().signMessage(message);

    const balance = await provider.getBalance(address);
    const formattedBalance = ethers.utils.formatEther(balance);

    response = await fetch("/web3-login-verify", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({
            address: address,
            signature: signature,
            balance: formattedBalance,
            _token: csrfToken(),
        }),
    });
    const data = await response.text();

    if (data == "Guest") {
        location.reload();
    } else if (data == "Admin") {
        window.location.href = "/admin";
    } else {
        alert(data);
    }
}
