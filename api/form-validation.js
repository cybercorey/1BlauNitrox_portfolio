// api/form-validation.js

const express = require('express');
const { Resend } = require('resend');

const router = express.Router();

router.post('/', async (req, res) => {
    console.log("whwudhwet");
  const { name, email, content } = req.body;

  // Initialize Resend client
  const resend = new Resend(process.env.EMAIL_KEY);

  try {
    // Send email using Resend
    const { data, error } = await resend.emails.send({
      from: 'Acme <onboarding@resend.dev>',
      to: ['delivered@resend.dev'],
      subject: 'Hello World',
      html: '<strong>It works!</strong>',
    });

    if (error) {
      console.error({ error });
      return res.status(500).json({ error: 'Failed to send email' });
    }

    console.log({ data });
    res.status(200).json({ message: 'Email sent successfully' });
  } catch (error) {
    console.error(error);
    res.status(500).json({ error: 'Internal server error' });
  }
});

module.exports = router;
