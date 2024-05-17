const express = require("express");
const app = express();
const mysql = require("mysql");

// Setup koneksi database
const connection = mysql.createConnection({
  host: "localhost",
  user: "username",
  password: "password",
  database: "lamaran",
});

// Koneksi ke database
connection.connect((err) => {
  if (err) {
    throw err;
  }
  console.log("Terhubung ke database MySQL");
});

// Mendapatkan data dari database
app.get("/jobs", (req, res) => {
  connection.query("SELECT * FROM job_listings", (err, rows) => {
    if (err) {
      throw err;
    }
    res.json(rows);
  });
});

const port = 3000;
app.listen(port, () => {
  console.log(`Server berjalan di http://localhost:${port}`);
});
