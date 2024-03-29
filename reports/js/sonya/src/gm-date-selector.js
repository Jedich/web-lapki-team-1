(function(window, document) {

    let currentDateSelector = null;

    dateSelector = function( query, options ) {
        if (!(this instanceof dateSelector))
            return new dateSelector( query, options );

        currentDateSelector = self = this;
        self.options = extend({}, dateSelector.defaults, options);
        self.query = query;

        self.__init__();

    };

    dateSelector.prototype = {
        constructor: dateSelector,

        __init__: function(){
            document.removeEventListener('click', self.bindCalendar, false);
            document.removeEventListener('keypress', self.keypressHandler, false);
            document.addEventListener('click', self.bindCalendar, false);
            document.addEventListener('keypress', self.keypressHandler, false);
        },

        matchesReferers: function( elm ){
            self.referers = document.querySelectorAll( self.query );
            for (var i=0; i< self.referers.length; i++) {
                if (elm === self.referers[i]) return true;
            }
            return false;
        },

        close: function(){
            delete self.current;
            delete self.target;
            if (self.selector) self.selector.remove();
        },

        show: function( target ){
            self.target = typeof target != typeof undefined ? target : self.target;
            if (target || typeof self.current == typeof undefined) {
                var current = new Date();
                if (target) self.selected = null;
                if (target && target.value) {
                    var ts = self.parseDate( target.value );
                    current = new Date( ts );
                    self.selected = {
                        year: current.getFullYear(),
                        month: current.getMonth(),
                        day: current.getDate()
                    }
                }
                self.current = {
                    year: current.getFullYear(),
                    month: current.getMonth()
                }
            }
            self.cleanSelector();
            self.drawSelector();
        },

        cleanSelector: function(){
            var selector = document.querySelector('.dateselector');
            if (selector) selector.remove();
        },

        drawSelector: function(){
            var position = {
                x:self.target.offsetLeft,
                y:self.target.offsetTop + self.target.offsetHeight
            };
            self.selector = document.createElement('div');
            self.selector.classList.add('dateselector');
            self.selector.style.left = position.x + 'px';
            self.selector.style.top = position.y + 'px';
            self.selector.appendChild( self.drawSelectorControls() );
            self.selector.appendChild( self.drawMonthTableContainer() );

            self.target.parentNode.insertBefore( self.selector, self.target.nextSibling );
        },


        drawSelectorControls: function() {
            var selectorControls = document.createElement('div');
            selectorControls.classList.add('selector-controls-container');
            selectorControls.classList.add('custom-select');

            var yearSelectorElement = document.createElement('select');
            yearSelectorElement.classList.add('year-selector-controller');
            yearSelectorElement.classList.add('custom-select');

            selectorControls.appendChild( yearSelectorElement );

            for (var years = 1960; years < 2030; years++) {
                var yearOption = document.createElement("option");
                if (years === new Date().getFullYear()){
                    yearOption.selected = true;
                }
                yearOption.value = years;
                yearOption.text = years;
                yearSelectorElement.appendChild(yearOption);
            }

            yearSelectorElement.addEventListener('change', function(){
                self.setSelectedYear(this.value);
            });


            var monthSelectorElement = document.createElement('select');
            monthSelectorElement.classList.add('month-selector-controller');
            var months = self.options.months.long;
            selectorControls.appendChild( monthSelectorElement );
            for (var i = 0; i < months.length; i++) {
                var monthOption = document.createElement("option");
                if (i === new Date().getMonth()){
                    monthOption.selected = true;
                }
                monthOption.value = i;
                monthOption.text = months[i];
                monthSelectorElement.appendChild(monthOption);
            }
            monthSelectorElement.addEventListener('change', function(){
                self.setSelectedMonth(this.value);
            });

            return selectorControls
        },

        drawMonthTableContainer: function() {
            var monthTableContainer = document.createElement('div');
            monthTableContainer.classList.add('month-table-container');

            monthTableContainer.appendChild( self.drawWeekHeader() );
            var weeks = self.getWeeks();
            for (var i=0; i<weeks.length; i++) {
                monthTableContainer.appendChild( weeks[i] );
            }

            return monthTableContainer;
        },

        drawWeekHeader: function(){
            var weekdays = self.options.weekdays.short.slice(self.options.firstDayOfWeek)
                .concat(self.options.weekdays.short.slice(0, self.options.firstDayOfWeek));
            var weekHeader = document.createElement('div');
            weekHeader.classList.add('week-header');
            for (var i=0; i<7; i++) {
                var dayOfWeek = document.createElement('div');
                dayOfWeek.setAttribute('tabIndex', 0);
                dayOfWeek.innerHTML = weekdays[i];
                weekHeader.appendChild( dayOfWeek );
            }
            return weekHeader;
        },

        getWeeks: function(){
            // Get week days according to options
            var weekdays = self.options.weekdays.short.slice(self.options.firstDayOfWeek)
                .concat(self.options.weekdays.short.slice(0, self.options.firstDayOfWeek));
            // Get first day of month and update acconding to options
            var firstOfMonth = new Date(self.current.year, self.current.month, 1).getDay();
            firstOfMonth = firstOfMonth < self.options.firstDayOfWeek ? 7+(firstOfMonth - self.options.firstDayOfWeek ) : firstOfMonth - self.options.firstDayOfWeek;

            var daysInPreviousMonth = new Date(self.current.year, self.current.month, 0).getDate();
            var daysInMonth = new Date(self.current.year, self.current.month+1, 0).getDate();

            var days = [],
                weeks = [];
            // Define last days of previous month if current month does not start on `firstOfMonth`
            for (var i=firstOfMonth-1; i>=0; i--) {
                var day = document.createElement('div');
                day.classList.add( 'no-select' );
                day.innerHTML = daysInPreviousMonth - i;
                days.push( day );
            }
            // Define days in current month
            for (var i=0; i<daysInMonth; i++) {
                if (i && (firstOfMonth+i)%7 === 0) {
                    weeks.push( self.addWeek( days ) );
                    days = [];
                }
                var day = document.createElement('div');
                day.classList.add('day');
                if (self.selected && self.selected.year == self.current.year && self.selected.month == self.current.month && self.selected.day == i+1) {
                    day.classList.add('selected');
                }
                day.setAttribute('tabIndex', 0);
                day.innerHTML = i+1;
                days.push( day );
            }
            // Define days of next month if last week is not full
            if (days.length) {
                var len = days.length;
                for (var i=0; i<7-len; i++) {
                    var day = document.createElement('div');
                    day.classList.add( 'no-select' );
                    day.innerHTML = i+1;
                    days.push( day );
                }
                weeks.push( self.addWeek( days ) );
            }
            return weeks;
        },

        addWeek: function( days ) {
            var week = document.createElement('div');
            week.classList.add('week');
            for (var i=0; i<days.length; i++) {
                week.appendChild( days[i] );
            }
            return week;
        },

        setDate: function( day ) {
            var oldDateValue = self.target.value
            var dayOfWeek = new Date(self.current.year, self.current.month, day).getDay();
            var date = self.options.outputFormat
                .replace('%a', self.options.weekdays.short[dayOfWeek] )
                .replace('%A', self.options.weekdays.long[dayOfWeek] )
                .replace('%d', ('0' + day).slice(-2) )
                .replace('%e', day )
                .replace('%b', self.options.months.short[self.current.month] )
                .replace('%B', self.options.months.long[self.current.month] )
                .replace('%m', ('0' + (self.current.month+1)).slice(-2) )
                .replace('%w', dayOfWeek )
                .replace('%Y', self.current.year );
            self.target.value = date;

            if (date !== oldDateValue) {
                if ("createEvent" in document) {
                    var changeEvent = document.createEvent("HTMLEvents");
                    changeEvent.initEvent("change", false, true);
                    self.target.dispatchEvent(changeEvent);
                }
                else {
                    self.target.fireEvent("onchange");
                }
            }
        },

        parseDate: function( date ) {
            var acceptedFormats = ['%a', '%A', '%d', '%e', '%b', '%B', '%m', '%w', '%Y'],
                pattern = new RegExp( self.options.outputFormat.replace(/%[a-zA-Z]/g, '(.+)') ),
                groups = pattern.exec( self.options.outputFormat ),
                matches = pattern.exec(date),
                date = new Date();

            for (var i = 1; i < matches.length; i++) {
                if (acceptedFormats.indexOf(groups[i]) == -1) {
                    console.log( 'DatePicker : Format error' );
                    break;
                }

                switch (groups[i]) {
                    case '%d':
                    case '%e':
                        date.setDate( matches[i] );
                        break;
                    case '%m':
                        date.setMonth( parseInt(matches[i]) - 1, date.getDate() );
                        break;
                    case '%b':
                        var month = self.options.months.short.indexOf( matches[i] );
                    case '%B':
                        month = month != -1 ? month : self.options.months.long.indexOf( matches[i] );
                        date.setMonth( month, date.getDate() );
                        break;
                    case '%Y':
                        date.setYear( matches[i] );
                        break;
                }
            }
            return date;
        },

        bindCalendar: function(event) {
            var target = event.target;
            if (target.className == 'month-navigate next') {
                self.getNextMonth();
            } else if (target.className == 'month-navigate previous') {
                self.getPreviousMonth();
            } else if (target.className == 'year-navigate next') {
                self.getNextYear();
            } else if (target.className == 'year-navigate previous') {
                self.getPreviousYear();
            } else if (target.className == 'day') {
                self.setDate( target.innerHTML );
                self.close();
            } else {
                while (target && !self.matchesReferers( target ) && target.className != 'dateselector') {
                    target = target.parentNode;
                }
                if (target && self.matchesReferers( target )) self.show(target);
                if (!target) self.close();
            }
        },

        keypressHandler: function (event) {
            var keyCode = event.which || event.keyCode;
            if (keyCode === 13) {
                self.bindCalendar(event);
            }
        }

    };

    let generateYears = function() {
        return Array.from({length: 50}, (v, k) => k+1960);
    };

    dateSelector.defaults = {
        firstDayOfWeek: 0,
        years: generateYears(),
        months: {
            short: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            long: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']
        },
        navigateYear: true,
        outputFormat:'%Y-%m-%d',
        weekdays: {
            short: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
            long: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday']
        }
    };

    let extend = function(out) {
        out = out || {};
        for (var i = 1; i < arguments.length; i++) {
            if (!arguments[i])
                continue;
            for (var key in arguments[i]) {
                if (arguments[i].hasOwnProperty(key))
                    out[key] = arguments[i][key];
            }
        }

        return out;
    };

}) (window, document);