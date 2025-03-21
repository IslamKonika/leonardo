<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Address Entry Component</title>

  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
      background-color: #f5f5f5;
      display: flex;
      justify-content: center;
    }

    .address-container {
      background-color: white;
      border-radius: 8px;
      padding: 24px;
      width: 100%;
      max-width: 500px;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .header {
      display: flex;
      align-items: center;
      margin-bottom: 20px;
    }

    .icon {
      width: 24px;
      height: 24px;
      background-color: #ff6b6b;
      border-radius: 50%;
      margin-right: 12px;
    }

    h2 {
      margin: 0;
      font-size: 18px;
      font-weight: 600;
    }

    p {
      margin: 0 0 16px 0;
      color: #555;
      font-size: 14px;
    }

    .address-input {
      width: 100%;
      padding: 12px;
      border: 1px solid #ddd;
      border-radius: 4px;
      font-size: 14px;
      box-sizing: border-box;
      margin-bottom: 10px;
    }

    .manual-option {
      font-size: 14px;
      color: #555;
      margin-bottom: 20px;
    }

    .manual-link {
      color: #0066cc;
      text-decoration: none;
      cursor: pointer;
    }

    .continue-btn {
      background-color: #ccc;
      border: none;
      color: white;
      padding: 10px 20px;
      border-radius: 4px;
      font-size: 14px;
      cursor: pointer;
      float: right;
    }
  </style>
</head>
<body>
  <div class="address-container">
    <div class="header">
      <div class="icon"></div>
      <h2>Address & Details</h2>
    </div>

    <p>Tell us where to collect your stuff from</p>

    <input type="text" class="address-input" placeholder="Start typing and select your address">

    <div class="manual-option">
      Or <span class="manual-link">enter manually</span>
    </div>
     <a href="#">
        <button class="continue-btn">Continue</button>
     </a>

  </div>

  <script src="/js/address.js"></script>
</body>
</html>
