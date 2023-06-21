const express = require('express');
const webhookHandler = require('../handlers/webhookHandler');

const router = express.Router();

router.post('/', webhookHandler.handleWebhook);

module.exports = router;