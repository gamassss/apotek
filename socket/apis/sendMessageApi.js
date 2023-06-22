const config = require('../config.json');

async function sendMessage(data) {
    const url = config.apiUrls.sendMessage;

    const customHeaders = {
        "Content-Type": "application/json",
        Authorization: config.token,
    };

    const response = await fetch(url, {
        method: "POST",
        headers: customHeaders,
        body: JSON.stringify(data),
    });
    // console.log(await response.json());
    return await response.json();
}

module.exports = {
    sendMessage,
};