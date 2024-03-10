// api/form-validation.js

const express = require('express');
const { Resend } = require('resend');

const router = express.Router();

router.post('/', async (req, res) => {
  const { name, email, content } = req.body;

  console.log('Received POST request to /api/form-validation');
  console.log('Name:', name);
  console.log('Email:', email);
  console.log('Content:', content);

  // Initialize Resend client
  const resend = new Resend('re_123456789');

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

    console.log('Email sent successfully:', data);
    res.status(200).json({ message: 'Email sent successfully' });
  } catch (error) {
    console.error('Error sending email:', error);
    res.status(500).json({ error: 'Internal server error' });
  }
});

module.exports = router;
