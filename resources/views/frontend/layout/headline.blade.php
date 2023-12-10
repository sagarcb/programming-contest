<div class="headline">
    <h3 class="headline-text">this is the headline text. Go and find yourself. there are more of the texts you can see here and where are you going now what the hell</h3>
</div>

<script>
    $(document).ready(function() {
        var scrollingElement = $(".headline-text");
        var contentWidth = scrollingElement.get(0).scrollWidth;
        var duration = contentWidth * 20; // Adjust scrolling speed

        // Append a clone of the content after the original content
        scrollingElement.append(" *** " +scrollingElement.html());

        function scrollText() {
            scrollingElement.animate({ scrollLeft: contentWidth }, duration, "linear", function() {
                scrollingElement.scrollLeft(0);
                scrollText();
            });
        }

        scrollText();
    });
</script>

