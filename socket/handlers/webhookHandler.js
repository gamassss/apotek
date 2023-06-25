const { sendMessage } = require("../apis/sendMessageApi");
const { createConnection } = require("../database");
const axios = require('axios');

const con = createConnection();

const handleWebhook = async (req, res) => {
    console.log(req.body);
    let res_detail;
    // if (req.body.message == "test") {
    //     const data = {
    //         target: req.body.sender,
    //         message: "working great!",
    //     };

    //     let json_res = await sendMessage(data);
    //     res_detail = JSON.stringify(json_res);
    //     console.log('res_detail ' + res_detail)
    // } else {
    let message = `hi ${req.body.name} your message is ${req.body.message}`;
    const data = {
        target: req.body.sender,
        message,
    };

    let json_res = await sendMessage(data);
    res_detail = JSON.stringify(json_res);
    console.log("res_detail " + res_detail);
    // }

    const dataToInsert = req.body;
    let pesan = dataToInsert.pesan;
    let device = dataToInsert.device;

    if (device.startsWith("0")) {
        device = "62" + device.slice(1);
    }

    let sender = dataToInsert.sender;

    const query =
        "INSERT INTO chats (text, pengirim, penerima, res_detail, created_at, updated_at) VALUES (?, ?, ?, ?, NOW(), NOW())";
    const values = [pesan, sender, device, res_detail];

    con.query(query, values, (error, results, fields) => {
        if (error) {
            console.error("Gagal melakukan operasi INSERT: ", error);
            return;
        }
        console.log("Chat berhasil diinsert");
        axios.get('/chats')
            .then(response => {
                console.log(response.data);
            })
            .catch(error => {
                console.error("Kesalahan dalam permintaan AJAX: ", error);
            });
    });

    res.end();
};

module.exports = {
    handleWebhook,
};
