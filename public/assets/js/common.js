function checkAll($control)
{
    $control.each(function()
    {
        var $this = $(this);

        if ($this.is(':checkbox'))
        {
            var $target = $this.data('target') ? $($this.data('target')) : false,
                $description = $this.data('description') ? $($this.data('description')).hide() : false;

            if (!$target || !$target.length)
            {
                $target = $this.closest('form');
            }

            var getCheckBoxes = function()
            {
                var $checkboxes,
                    filter = $this.data('filter');

                $checkboxes = filter
                    ? $target.find(filter).filter('input:checkbox')
                    : $target.find('input:checkbox');

                return $checkboxes;
            };

            var setSelectAllState = function()
            {
                var $checkboxes = getCheckBoxes(),
                    allSelected = $checkboxes.length > 0;

                $checkboxes.each(function() {
                    if ($(this).is($this))
                    {
                        return true;
                    }

                    if (!$(this).prop('checked'))
                    {
                        allSelected = false;
                        return false;
                    }
                });

                $this.prop('checked', allSelected);
            };
            setSelectAllState();

            var toggleAllRunning = false;

            $target.on('click', 'input:checkbox', function(e)
            {
                if (toggleAllRunning)
                {
                    return;
                }

                var $target = $(e.target);
                if ($target.is($this))
                {
                    return;
                }

                if ($this.data('filter'))
                {
                    if (!$target.closest($this.data('filter')).length)
                    {
                        return;
                    }
                }

                setSelectAllState();
            });

            $target.on('change', 'input:checkbox', function(e)
            {
                if ($description && $description.length)
                {
                    var checked = false,
                        $checkboxes = getCheckBoxes();

                    $checkboxes.each(function()
                    {
                        if ($(this).is(':checked'))
                        {
                            checked = true;
                        }
                    });

                    if (checked)
                    {
                        $description.show().removeClass('hide');
                    }
                    else
                    {
                        $description.hide().addClass('hide');
                    }
                }
            });

            $this.click(function(e)
            {
                if (toggleAllRunning)
                {
                    return;
                }

                toggleAllRunning = true;
                getCheckBoxes().prop('checked', e.target.checked).triggerHandler('click');
                toggleAllRunning = false;

                if ($description && $description.length)
                {
                    if ($(this).is(':checked'))
                    {
                        $description.show().removeClass('hide');
                    }
                    else
                    {
                        $description.hide().addClass('hide');
                    }
                }
            });
        }
        else
        {
            $this.click(function(e)
            {
                var target = $this.data('target');

                if (target)
                {
                    $(target).prop('checked', true);
                }
            });
        }
    });
}

$(function () {
    checkAll($('input.check-all, a.check-all, label.check-all'));
    // delete button
    $(document).on('click', 'input[type="checkbox"]', function () {
        var checkbox_length = $('input.check:checked').length;
        if (checkbox_length > 0) {
            $('.bulk-action .btn-delete-submit').removeClass('hidden');
        } else {
            $('.bulk-action .btn-delete-submit').addClass('hidden');
        }
    });
});