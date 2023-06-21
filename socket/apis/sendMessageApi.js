async function sendMessage(data) {
    const url = "https://api.fonnte.com/send";

    const customHeaders = {
        "Content-Type": "application/json",
        Authorization: "QI7VDZtc64p4Dg6_EjpX",
    };

    const response = await fetch(url, {
        method: "POST",
        headers: customHeaders,
        body: JSON.stringify(data),
    });
    console.log(await response.json());
}

module.exports = {
    sendMessage,
};