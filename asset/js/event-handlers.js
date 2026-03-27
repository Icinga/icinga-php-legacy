;(function (window) {
    'use strict';

    const formElementFocus = (ev) => {
        const $ = window.jQuery;
        const $input = $(ev.currentTarget);

        if ($input.closest('form.editor').length) {
            return;
        }

        const $set = $input.closest('.extensible-set');
        if ($set.length) {
            const $textInputs = $('input[type=text]', $set);
            if ($textInputs.length > 1) {
                $textInputs.not(':first').attr('tabIndex', '-1');
            }
        }

        const $dd = $input.closest('dd');
        if ($dd.attr('id') && $dd.attr('id').match(/button/)) {
            return;
        }

        const $li = $input.closest('li');
        const $dt = $dd.prev();
        const $form = $dd.closest('form');

        $form.find('dt, dd, dl, li').removeClass('active');
        $li.addClass('active');
        $dt.addClass('active');
        $dd.addClass('active');
        $dt.closest('dl').addClass('active');
    };

    const toggleCollapsible = (ev) => {
        const $toggle = window.jQuery(ev.currentTarget);
        $toggle.parent().toggleClass('collapsed');
    };

    const registerHandlers = () => {
        const $ = window.jQuery;
        $(document).on('focus', 'form.gipfl-form input, form.gipfl-form textarea, form.gipfl-form select', formElementFocus);
        $(document).on('click', '.gipfl-collapsible-control', toggleCollapsible);
    };

    const waitForJQuery = (() => {
        const started = Date.now();
        const poll = () => {
            if (typeof window.jQuery !== 'undefined') {
                registerHandlers();
            } else if (Date.now() - started >= 60_000) {
                console.error('icinga-php-legacy: jQuery did not become available within 60 seconds — event handlers not registered.');
            } else {
                setTimeout(poll, 100);
            }
        };
        return poll;
    })();

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', waitForJQuery);
    } else {
        waitForJQuery();
    }
})(window);
