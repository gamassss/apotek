const mysql = require("mysql");

function createConnection() {
    return mysql.createConnection({
        host: "localhost",
        user: "root",
        password: "",
        database: "apotek",
        timezone: "Asia/Jakarta"
    });
}

module.exports = {
    createConnection,
};