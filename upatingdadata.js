<script>
    function updateData() {
        var dataToSend = {name: 'Kevin', age: 18};
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "userconnections.php");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                console.log(xhr.responseText);
            } else if (xhr.readyState === XMLHttpRequest.OVER_SENT) {
                console.log("request sent.");
            } else if (xhr.readyState === XMLHttpRequest.LOADING) {
                console.log("loading...");
            } else if (xhr.readyState === XMLHttpRequest.TIMED_OUT) {
                console.log("Request timed out.");
            } else if (xhr.readyState === XMLHttpRequest.FAILED) {
                console.log("Request failed:", xhr.statusText);
            }
        };
        xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
        xhr.send(JSON.stringify(dataToSend));
    }
</script>
