const { sendMessage } = require('../apis/sendMessageApi');
const { createConnection } = require('../database');

const con = createConnection();

const handleWebhook = (req, res) => {
    console.log(req.body);

    if (req.body.message == "test") {
        const data = {
            target: req.body.sender,
            message: "working great!",
        };
        sendMessage(data);
    } else {
        const data = {
            target: req.body.sender,
            message: "this is default reply from fonnte",
        };
        sendMessage(data);
    }

    const dataToInsert = req.body;
    let pesan = dataToInsert.pesan;
    let device = dataToInsert.device;
    if (device.startsWith("0")) {
        device = "62" + device.slice(1);
    }
    let sender = dataToInsert.sender;

    const query =
        "INSERT INTO chats (text, penerima, pengirim, created_at, updated_at) VALUES (?, ?, ?, NOW(), NOW())";
    const values = [pesan, device, sender];

    con.query(query, values, (error, results, fields) => {
        if (error) {
            console.error("Gagal melakukan operasi INSERT: ", error);
            return;
        }
        console.log("Data berhasil diinsert");
    });

    res.end();
};

module.exports = {
    handleWebhook,
};
