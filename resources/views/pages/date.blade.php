<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Storage Pickup Scheduler</title>
  <style>
    /* CSS Reset and Base Styles */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', sans-serif;
    }

    body {
      background-color: #f5f5f5;
      color: #333;
    }

    .container {
      display: flex;
      max-width: 1200px;
      margin: 0 auto;
      background-color: #fff;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    /* Calendar Section */
    .calendar-section {
      width: 65%;
      padding: 30px;
    }

    .calendar-header {
      text-align: center;
      margin-bottom: 30px;
    }

    .calendar-title {
      font-size: 20px;
      font-weight: 500;
      margin-bottom: 20px;
    }

    .month-selector {
      display: flex;
      justify-content: center;
      align-items: center;
      margin-bottom: 20px;
    }

    .month-selector button {
      background: none;
      border: none;
      color: #20b2aa;
      font-size: 18px;
      cursor: pointer;
      padding: 0 15px;
    }

    .month-name {
      font-size: 18px;
      font-weight: 500;
      margin: 0 30px;
    }

    .time-slot {
      display: flex;
      justify-content: center;
      margin-bottom: 20px;
    }

    .time-slot button {
      background-color: #20b2aa;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 4px;
      cursor: pointer;
      font-size: 14px;
    }

    .calendar {
      margin-bottom: 30px;
    }

    .days-header {
      display: grid;
      grid-template-columns: repeat(7, 1fr);
      text-align: center;
      margin-bottom: 10px;
    }

    .day-name {
      padding: 8px;
      font-size: 14px;
    }

    .calendar-grid {
      display: grid;
      grid-template-rows: repeat(6, auto);
    }

    .calendar-week {
      display: grid;
      grid-template-columns: repeat(7, 1fr);
    }

    .calendar-date {
      border: 1px solid #e0e0e0;
      margin: 4px;
      padding: 8px;
      text-align: center;
      cursor: pointer;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      min-height: 60px;
    }

    .calendar-date.faded {
      color: #bbb;
    }

    .calendar-date.selected {
      border: 2px solid #20b2aa;
    }

    .date-number {
      font-size: 16px;
      margin-bottom: 4px;
    }

    .date-tag {
      font-size: 12px;
    }

    .free-tag {
      color: #20b2aa;
    }

    .continue-button {
      display: flex;
      justify-content: center;
    }

    .continue-button button {
      background-color: #20b2aa;
      color: white;
      border: none;
      padding: 12px 30px;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
    }

    /* Summary Section */
    .summary-section {
      width: 35%;
      padding: 30px;
      background-color: #e0f7f6;
    }

    .summary-header {
      font-weight: 500;
      margin-bottom: 20px;
    }

    .summary-item {
      margin-bottom: 20px;
    }

    .summary-item-header {
      display: flex;
      justify-content: space-between;
      margin-bottom: 8px;
    }

    .dropdown-label {
      display: flex;
      align-items: center;
    }

    .dropdown-icon {
      margin-right: 8px;
    }

    .edit-link {
      color: #20b2aa;
      text-decoration: none;
      font-size: 14px;
    }

    .summary-item-content {
      padding-left: 24px;
      font-size: 14px;
    }

    .content-row {
      display: flex;
      justify-content: space-between;
    }

    .muted-text {
      color: #777;
    }

    .total-section {
      border-top: 1px solid #b2e8e5;
      border-bottom: 1px solid #b2e8e5;
      padding: 15px 0;
      margin-bottom: 20px;
      font-weight: 500;
      display: flex;
      justify-content: space-between;
    }

    .info-section {
      margin-bottom: 20px;
      font-size: 14px;
    }

    .info-link {
      color: #20b2aa;
      text-decoration: none;
    }

    .notice-box {
      background-color: #d1f1f0;
      padding: 15px;
      font-size: 12px;
      text-align: center;
      border-radius: 4px;
    }
  </style>
</head>
<body>
  <div class="container">
    <!-- Calendar Section -->
    <div class="calendar-section">
      <div class="calendar-header">
        <h2 class="calendar-title">Select a date for us to come pick up your stuff</h2>

        <div class="month-selector">
          <button id="prev-month">&#10094;</button>
          <h3 class="month-name" id="current-month">March 2025</h3>
          <button id="next-month">&#10095;</button>
        </div>

        <div class="time-slot">
          <button>07:00-18:00</button>
        </div>
      </div>

      <div class="calendar">
        <div class="days-header">
          <div class="day-name">Mon</div>
          <div class="day-name">Tue</div>
          <div class="day-name">Wed</div>
          <div class="day-name">Thu</div>
          <div class="day-name">Fri</div>
          <div class="day-name">Sat</div>
          <div class="day-name">Sun</div>
        </div>

        <div class="calendar-grid" id="calendar-grid">
          <!-- Calendar will be generated by JavaScript -->
        </div>
      </div>

      <div class="continue-button">
        <button>Continue</button>
      </div>
    </div>

    <!-- Summary Section -->
    <div class="summary-section">
      <h3 class="summary-header">Due now - upfront payment</h3>

      <!-- Storage fee -->
      <div class="summary-item">
        <div class="summary-item-header">
          <div class="dropdown-label">
            <span class="dropdown-icon">▼</span>
            <span>Storage per month</span>
          </div>
          <a href="#" class="edit-link">Edit</a>
        </div>
        <div class="summary-item-content">
          <div class="content-row">
            <span>1 items</span>
            <span>£4.40 /mo</span>
          </div>
        </div>
      </div>

      <!-- Packing materials -->
      <div class="summary-item">
        <div class="summary-item-header">
          <div class="dropdown-label">
            <span class="dropdown-icon">▼</span>
            <span>Packing materials</span>
          </div>
          <a href="#" class="edit-link">Edit</a>
        </div>
        <div class="summary-item-content">
          <div class="content-row">
            <span>2 items</span>
            <div>
              <div>£3.75</div>
              <div class="muted-text">One off</div>
            </div>
          </div>
        </div>
      </div>

      <!-- Collection address -->
      <div class="summary-item">
        <div class="summary-item-header">
          <span>Collection address</span>
          <a href="#" class="edit-link">Edit</a>
        </div>
        <div class="summary-item-content">
          4, Unity Street, Blackfish Engineering Design Ltd, Bristol, BS1 5HH
        </div>
      </div>

      <!-- Collect from -->
      <div class="summary-item">
        <div class="summary-item-header">
          <span>Collect from...</span>
          <span>FREE</span>
        </div>
        <div class="summary-item-content">
          The ground floor
        </div>
      </div>

      <!-- Collection date -->
      <div class="summary-item">
        <div class="summary-item-header">
          <span>Collection date</span>
          <a href="#" class="edit-link">Edit</a>
        </div>
        <div class="summary-item-content">
          <div class="content-row">
            <span id="selected-date-display">26th Mar '25, 07:00-18:00</span>
            <span id="collection-fee">FREE</span>
          </div>
        </div>
      </div>

      <!-- Total -->
      <div class="total-section">
        <span>Total due today</span>
        <span id="total-price">£8.15</span>
      </div>

      <!-- Return charges -->
      <div class="info-section">
        <div class="dropdown-label">
          <span class="dropdown-icon">▼</span>
          <span>Return charges apply</span>
        </div>
      </div>

      <!-- Delivery info -->
      <div class="info-section">
        <p>Delivery fees are charged when you order your stuff back, <a href="#" class="info-link">find out more here</a>.</p>
      </div>

      <!-- Cancellation notice -->
      <div class="notice-box">
        FREE to cancel or amend your order if you let us know before 11am one working day prior to your collection.
      </div>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Calendar data
      const calendarGrid = document.getElementById('calendar-grid');
      const currentMonthElement = document.getElementById('current-month');
      const selectedDateDisplay = document.getElementById('selected-date-display');
      const collectionFeeElement = document.getElementById('collection-fee');
      const totalPriceElement = document.getElementById('total-price');

      let selectedDate = '26'; // Default selected date

      // Fixed prices
      const basePrice = 8.15; // £4.40 + £3.75

      // March 2025 dates
      const marchDates = [
        ['24', '25', '26', '27', '28', '1', '2'],
        ['3', '4', '5', '6', '7', '8', '9'],
        ['10', '11', '12', '13', '14', '15', '16'],
        ['17', '18', '19', '20', '21', '22', '23'],
        ['24', '25', '26', '27', '28', '29', '30'],
        ['31', '1', '2', '3', '4', '5', '6']
      ];

      // Free dates and special prices
      const freeDates = ['25', '26', '31'];
      const specialPrices = {
        '27': 2.00, // £2
        '28': 3.50  // £3.50 (additional example)
      };

      // Update collection fee and total
      function updatePricing() {
        // Set collection fee
        if (freeDates.includes(selectedDate)) {
          collectionFeeElement.textContent = 'FREE';
          totalPriceElement.textContent = `£${basePrice.toFixed(2)}`;
        } else if (selectedDate in specialPrices) {
          const fee = specialPrices[selectedDate];
          collectionFeeElement.textContent = `£${fee.toFixed(2)}`;
          totalPriceElement.textContent = `£${(basePrice + fee).toFixed(2)}`;
        } else {
          // Default fee if not free or special
          const defaultFee = 4.00;
          collectionFeeElement.textContent = `£${defaultFee.toFixed(2)}`;
          totalPriceElement.textContent = `£${(basePrice + defaultFee).toFixed(2)}`;
        }
      }

      // Render calendar
      function renderCalendar() {
        calendarGrid.innerHTML = '';

        marchDates.forEach((week, weekIndex) => {
          const weekRow = document.createElement('div');
          weekRow.className = 'calendar-week';

          week.forEach((date, dateIndex) => {
            const dateCell = document.createElement('div');
            dateCell.className = 'calendar-date';

            // Add faded class for previous/next month dates
            if ((weekIndex === 0 && parseInt(date) > 20) || (weekIndex === 5 && parseInt(date) < 10)) {
              dateCell.classList.add('faded');
            }

            // Add selected class
            if (date === selectedDate) {
              dateCell.classList.add('selected');
            }

            // Date number
            const dateNumber = document.createElement('div');
            dateNumber.className = 'date-number';
            dateNumber.textContent = date;
            dateCell.appendChild(dateNumber);

            // Free tag
            if (freeDates.includes(date)) {
              const freeTag = document.createElement('div');
              freeTag.className = 'date-tag free-tag';
              freeTag.textContent = 'FREE';
              dateCell.appendChild(freeTag);
            }

            // Special price tag
            if (date in specialPrices) {
              const priceTag = document.createElement('div');
              priceTag.className = 'date-tag';
              priceTag.textContent = `£${specialPrices[date].toFixed(2)}`;
              dateCell.appendChild(priceTag);
            }

            // Click event
            dateCell.addEventListener('click', function() {
              // Remove selected class from all dates
              document.querySelectorAll('.calendar-date').forEach(cell => {
                cell.classList.remove('selected');
              });

              // Add selected class to clicked date
              this.classList.add('selected');

              // Update selected date
              selectedDate = date;

              // Update displays
              updateSelectedDateDisplay();
              updatePricing();
            });

            weekRow.appendChild(dateCell);
          });

          calendarGrid.appendChild(weekRow);
        });
      }

      // Update selected date display
      function updateSelectedDateDisplay() {
        const suffix = getSuffix(selectedDate);
        selectedDateDisplay.textContent = `${selectedDate}${suffix} Mar '25, 07:00-18:00`;
      }

      // Get ordinal suffix for date
      function getSuffix(date) {
        const num = parseInt(date);
        if (num >= 11 && num <= 13) {
          return 'th';
        }

        switch (num % 10) {
          case 1: return 'st';
          case 2: return 'nd';
          case 3: return 'rd';
          default: return 'th';
        }
      }

      // Month navigation
      document.getElementById('prev-month').addEventListener('click', function() {
        currentMonthElement.textContent = 'February 2025';
        // In a real app, you would update the calendar data and re-render
      });

      document.getElementById('next-month').addEventListener('click', function() {
        currentMonthElement.textContent = 'April 2025';
        // In a real app, you would update the calendar data and re-render
      });

      // Initial render and pricing
      renderCalendar();
      updatePricing();
    });
  </script>
</body>
</html>
