class PersianDatePicker {
    constructor(inputId, datepickerId) {
    this.input = document.getElementById(inputId);
    this.datepicker = document.getElementById(datepickerId);
    this.currentDate = this.getCurrentPersianDate();
    this.selectedDate = null;
    this.init();
    }
    
    init() {
    this.input.addEventListener('click', () => this.toggleDatepicker());
    this.render();
    }
    
    // دریافت تاریخ امروز به صورت شمسی (ساده شده)
    getCurrentPersianDate() {
    const date = new Date();
    // تبدیل ساده به تاریخ شمسی (فرضی! برای دقت بالا نیاز به الگوریتم دقیق دارید)
    return {
        year: 1403, // سال فرضی
        month: 5, // ماه فرضی
        day: date.getDate(),
    };
    }
    
    // تولید نام ماه‌های شمسی
    getMonthName(month) {
    const months = [
        'فروردین', 'اردیبهشت', 'خرداد', 'تیر', 'مرداد', 'شهریور',
        'مهر', 'آبان', 'آذر', 'دی', 'بهمن', 'اسفند'
    ];
    return months[month - 1];
    }
    
    // تولید روزهای ماه
    generateMonthDays(year, month) {
    const daysInMonth = month <= 6 ? 31 : month < 12 ? 30 : 29; // ساده شده (بدون در نظر گرفتن کبیسه)
    const days = [];
    for (let day = 1; day <= daysInMonth; day++) {
        days.push(day);
    }
    return days;
    }
    
    // رندر تقویم
    render() {
    const { year, month } = this.currentDate;
    const days = this.generateMonthDays(year, month);
    const monthName = this.getMonthName(month);
    
    // ساختار HTML
    this.datepicker.innerHTML = `
        <div class="datepicker-header">
            <button onclick="datepicker.prevMonth()">←</button>
            <div>${monthName} ${year}</div>
            <button onclick="datepicker.nextMonth()">→</button>
        </div>
        <div class="datepicker-grid">
            ${['ش', 'ی', 'د', 'س', 'چ', 'پ', 'ج'].map(day => `<div class="datepicker-cell">${day}</div>`).join('')}
            ${days.map(day => `
                <div class="datepicker-cell ${this.selectedDate === day ? 'selected' : ''}" 
                     onclick="datepicker.selectDate(${day})">
                    ${day}
                </div>
            `).join('')}
        </div>
    `;
    }
    
    // تغییر ماه
    prevMonth() {
    if (this.currentDate.month === 1) {
        this.currentDate.year--;
        this.currentDate.month = 12;
    } else {
        this.currentDate.month--;
    }
    this.render();
    }
    
    nextMonth() {
    if (this.currentDate.month === 12) {
        this.currentDate.year++;
        this.currentDate.month = 1;
    } else {
        this.currentDate.month++;
    }
    this.render();
    }
    
    // انتخاب تاریخ
    selectDate(day) {
    this.selectedDate = day;
    this.input.value = `${this.currentDate.year}/${this.currentDate.month}/${day}`;
    this.datepicker.style.display = 'none';
    this.render();
    }
    
    // نمایش/مخفی کردن تقویم
    toggleDatepicker() {
    this.datepicker.style.display = this.datepicker.style.display === 'none' ? 'block' : 'none';
    }
    }
    
    // ایجاد نمونه
    const datepicker = new PersianDatePicker('dateInput', 'datepicker');