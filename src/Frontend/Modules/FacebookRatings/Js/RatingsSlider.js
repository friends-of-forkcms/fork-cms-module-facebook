jsFrontend.FacebookRatings =
{
    init: function()
    {
        jsFrontend.FacebookRatings.WidgetRatingsSlider.init();
    }
};

jsFrontend.FacebookRatings.WidgetRatingsSlider =
{
    count: null,
    currentIndex: null,
    data: null,
    init: function()
    {
        jsFrontend.FacebookRatings.WidgetRatingsSlider.data = jsFrontend.data.get('FacebookRatings.ratings');
        jsFrontend.FacebookRatings.WidgetRatingsSlider.count = jsFrontend.FacebookRatings.WidgetRatingsSlider.data.length;

        jsFrontend.FacebookRatings.WidgetRatingsSlider.updateView(0);

        $('.widget-ratings-slider-body-controls a').on('click', function(e) {
            e.preventDefault();
            var bump = $(this).data('role') === 'next' ? 1 : -1;

            jsFrontend.FacebookRatings.WidgetRatingsSlider.updateView(
                jsFrontend.FacebookRatings.WidgetRatingsSlider.getNewIndex(bump)
            );
        });
    },

    getNewIndex: function(bump)
    {
        var currentIndex = jsFrontend.FacebookRatings.WidgetRatingsSlider.currentIndex;
        var count = jsFrontend.FacebookRatings.WidgetRatingsSlider.count;

        if (currentIndex + bump < 0) {
            return count - 1;
        }

        if (currentIndex + bump <= count - 1) {
            return currentIndex += bump;
        }

        return 0;
    },

    updateView: function(index)
    {
        jsFrontend.FacebookRatings.WidgetRatingsSlider.currentIndex = index;

        var $widget = $('.widget-facebook-ratings-ratings-slider');
        var rating = jsFrontend.FacebookRatings.WidgetRatingsSlider.data[index];

        $widget.find('.widget-ratings-slider-body-title').text(rating.reviewer.name);
        $widget.find('.widget-ratings-slider-body-rating').html(rating.stars_html);

        var text = (rating.review_text !== undefined) ? '"' + rating.review_text + '"' : '';
        $widget.find('.widget-ratings-slider-body-text').html(text);
    }
};

$(jsFrontend.FacebookRatings.init);
