const express = require("express");
const app = express();
app.use(express.json());

let mysql = require("mysql");
let con = mysql.createConnection({
    host: "localhost",
    user: "root",
    password: "",
    database: "apotek",
    timezone: "Asia/Jakarta"
});

con.connect(function (err) {
    if (err) {
        throw err;
    }
    console.log("Database Connecteed");
});

async function sendFonnte(data) {
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

app.post("/webhook", function (req, res) {
    console.log(req.body);
    if (req.body.message == "test") {
        const data = {
            target: req.body.sender,
            message: "working great!",
        };
        sendFonnte(data);
    } else {
        const data = {
            target: req.body.sender,
            message: "this is default reply from fonnte",
        };
        sendFonnte(data);
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

    con.end();
    res.end();
});

app.listen(3000, function (err) {
    if (err) console.log(err);
    console.log("Server listening on PORT", 3000);
});
