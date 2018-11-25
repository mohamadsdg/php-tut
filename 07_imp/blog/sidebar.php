<div class="sidebar pure-u-5-24">
    <div class="inside">
        <?php echo getSidebarTitle() ?>

        <div class="menu">
            <form action="./blog/savePhone.php" method="get">
                <label for="phone">save your phone : </label>
                <input id="phone" type="text" name="phone" placeholder="123">
                <br>
                <br>
                <button type="submit" id="btn1">SAVE</button>
            </form>
        </div>

        <div class="menu">
            <form id="searchForm" action="./blog/searchPhone.php" method="get">
                <label for="phone2">search phone : </label>
                <input id="phone2" type="text" name="phone2" placeholder="enter number " autocomplete="off">
                <br>
<!--                <button type="submit" id="btn2">Search</button>-->
            </form>
            <div id="result"></div>
        </div>

    </div>

</div>

<script type="text/javascript">
    function isValidPhone(phone) {
        return !isNaN(parseFloat(phone)) && isFinite(phone);
    }

    $('document').ready(function () {
        $('#btn1').click(function (e) {
            // e.preventDefault();
            var phone = $("input[name='phone']").val();
            if (phone.length === 11 && isValidPhone(phone) && phone.substr(0, 2) === '09') {
                alert("Valid Number !")
            } else {
                alert("Invalid Number !");
                return false;
            }
        });

        $('input[name=phone2]').keyup(function (e) {
            // e.preventDefault();
            $('#result').html("Loading ...");

            $.ajax({
                url: './blog/searchPhone.php',
                method: 'get',
                data: $('#searchForm').serialize(),
                success: function (res) {
                    // console.log(res);
                    $('#result').html(res);
                }
            });
        })

    })
</script>