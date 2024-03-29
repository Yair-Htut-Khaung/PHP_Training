//nav-active
jQuery(function ($) {
    var path = window.location.href;
    // because the 'href' property of the DOM element is the absolute path
    $('.tab-link a').each(function () {
        if (this.href === path) {
            $(this).addClass('active-nav-a');
        }
    });

    //pagination
    (function ($, window, document) {
        'use strict';
        var Paginator = function (element, options) {
            this.el = $(element);
            this.options = $.extend({}, $.fn.paginathing.defaults, options);
            this.startPage = 1;
            this.currentPage = 1;
            this.totalItems = this.el.children().length;
            this.totalPages = Math.ceil(this.totalItems / this.options.perPage);
            this.container = $('<div></div>').addClass(this.options.containerClass);
            this.ul = $('<ul></ul>').addClass(this.options.ulClass);
            this.show(this.startPage);
            return this;
        }
        Paginator.prototype = {
            pagination: function (type, page) {
                var _self = this;
                var li = $('<li></li>');
                var a = $('<a></a>').attr('href', '#');
                var cssClass = type === 'number' ? _self.options.liClass : type;
                var text = type === 'number' ? page : _self.paginationText(type);
                li.addClass(cssClass);
                li.data('pagination-type', type);
                li.data('page', page);
                li.append(a.html(text));
                return li;
            },
            paginationText: function (type) { return this.options[type + 'Text']; },
            buildPagination: function () {
                var _self = this;
                var pagination = [];
                var prev = _self.currentPage - 1 < _self.startPage ? _self.startPage : _self.currentPage - 1;
                var next = _self.currentPage + 1 > _self.totalPages ? _self.totalPages : _self.currentPage + 1;
                var start, end;
                var limit = 5;
                var interval = 2;
                console.log(_self.totalPages);
                if (_self.totalPages > limit) {
                    if (_self.currentPage <= Math.ceil(limit / 2) + 0.5) { start = 1; end = limit; }
                    else if (_self.currentPage + Math.floor(limit / 2) >= _self.totalPages) { start = _self.totalPages + 1 - limit; end = _self.totalPages; }
                    else { start = _self.currentPage - Math.ceil(limit / 2 - 0.5); end = _self.currentPage + Math.floor(limit / 2); }
                } else { start = _self.startPage; end = _self.totalPages; }
                if (_self.options.firstLast) { pagination.push(_self.pagination('first', _self.startPage)); }
                if (_self.options.prevNext) { pagination.push(_self.pagination('prev', prev)); }
                for (var i = start; i <= end; i++) { pagination.push(_self.pagination('number', i)); }
                if (_self.options.prevNext) { pagination.push(_self.pagination('next', next)); }
                if (_self.options.firstLast) { pagination.push(_self.pagination('last', _self.totalPages)); }
                return pagination;
            },
            render: function (page) {
                var _self = this;
                var options = _self.options;
                var pagination = _self.buildPagination();
                _self.ul.children().remove();
                _self.ul.append(pagination);
                var startAt = page === 1 ? 0 : (page - 1) * options.perPage;
                var endAt = page * options.perPage;
                _self.el.children().hide();
                _self.el.children().slice(startAt, endAt).show();
                _self.ul.children().each(function () {
                    var _li = $(this);
                    var type = _li.data('pagination-type');
                    switch (type) {
                        case 'number':
                            if (_li.data('page') === page) { _li.addClass(options.activeClass); } break; case 'first':
                            page === _self.startPage && _li.toggleClass(options.disabledClass); break; case 'last':
                            page === _self.totalPages && _li.toggleClass(options.disabledClass); break; case 'prev':
                            (page - 1) < _self.startPage && _li.toggleClass(options.disabledClass); break; case 'next':
                            (page + 1) > _self.totalPages && _li.toggleClass(options.disabledClass); break; default: break;
                    }
                });
                if (options.insertAfter) { _self.container.append(_self.ul).insertAfter($(options.insertAfter)); }
                else { _self.el.after(_self.container.append(_self.ul)); }
            },
            handle: function () { var _self = this; _self.container.find('li').each(function () { var _li = $(this); _li.click(function (e) { e.preventDefault(); var page = _li.data('page'); _self.currentPage = page; _self.show(page); }); }); },
            show: function (page) { var _self = this; _self.render(page); _self.handle(); }
        }
        $.fn.paginathing = function (options) {
            var _self = this;
            var settings = (typeof options === 'object') ? options : {};
            return _self.each(function () { var paginate = new Paginator(this, options); return paginate; });
        };
        $.fn.paginathing.defaults = {
            perPage: 5,
            prevNext: true,
            firstLast: false,
            prevText: '<span>&lt&lt</span>',
            nextText: '<span><bold>&gt&gt</bold></span>',
            firstText: 'First',
            lastText: 'Last',
            containerClass: 'pagination_cont',
            ulClass: 'pagination_numbers',
            liClass: 'pagination_button',
            activeClass: 'active',
            disabledClass: 'passive',
            insertAfter: null
        }
    }(jQuery, window, document));



    $('.schedule-row-loop-div').paginathing({
        perPage: 30,
    });




});

function myFunction() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}