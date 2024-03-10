// api/server.js

const express = require('express');
const bodyParser = require('body-parser');
const formValidationRouter = require('./form-validation');

const app = express();
const PORT = process.env.PORT || 3000;

// Middleware
app.use(bodyParser.urlencoded({ extended: false }));
app.use(bodyParser.json());

// Routes
app.use('/api/form-validation', formValidationRouter);

// Serve the index.html file for the root URL
app.get('/', (req, res) => {
    res.sendFile(path.join(__dirname, '..', 'index.html'));
  });
  
// Start server
app.listen(PORT, () => {
    console.log(`Server is running on port ${PORT}`);
});
