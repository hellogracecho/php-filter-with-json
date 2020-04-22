// Filters
//Filter function for filtering through Experiences on Product Page

window.addEventListener("DOMContentLoaded", event => {
    //Selecting all select options in select fields
    const selectElement = document.querySelectorAll(".filters");

    //Loop through each filter option to add event listener
    selectElement.forEach(function (elem) {
        elem.addEventListener("change", e => {
            var classNames = "";
            let counter = 0;
            //when to display no experience message
            let displayNoExpMsg = true;
            // Loop through select index to add classNames to value
            selectElement.forEach(function (e2) {
                displayNoExpMsg = e2.selectedIndex === 0 && displayNoExpMsg;
                console.log(e2.options[e2.selectedIndex].value);
                if (e2.options[e2.selectedIndex].value) {
                    classNames += "." + e2.options[e2.selectedIndex].value;
                    console.log('1', classNames);
                }
            });
            // Selecting Single Product info card to hide by default and show if classNames matches e2
            document.querySelectorAll(".single-item").forEach(function (e2) {
                console.log('2', classNames);
                if (classNames) {
                    e2.style.display = "none";
                    if (e2.matches(classNames)) {
                        counter++;
                        e2.style.display = "table-row";
                    }
                } else {
                    e2.style.display = "table-row ";
                }
            });
            if (counter === 0 && !displayNoExpMsg) {
                document.getElementById("filter-message-container").innerHTML =
                    "<p>Filter Result: No data found</p>";
            } else {
                document.getElementById("filter-message-container").innerHTML = "";
            }
        });
    });
});