<script>
    document.onreadystatechange = function () {
        if (document.readyState == "loading") {
            $(".se-pre-con").fadeOut("slow");
        } else if (document.readyState == "complete") {
            $(".se-pre-con").hide();
        }
    };
</script>
</body>
</html>