const express = require('express');
const webhookHandler = require('../handlers/webhookHandler');

const router = express.Router();

router.post('/', webhookHandler.handleWebhook);

router.get('/', (req, res) => {
    res.send('masuk webhook')
});

module.exports = router;