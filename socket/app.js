const express = require("express");
const webhookRoutes = require('./routes/webhookRoutes');
const app = express();
app.use(express.json());

app.use('/webhook', webhookRoutes);

app.listen(3000, function (err) {
    if (err) console.log(err);
    console.log("Server listening on PORT", 3000);
});
