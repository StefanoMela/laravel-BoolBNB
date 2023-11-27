<script>
    var options = {
      searchOptions: {
        key: "5uNY3BSE9gSMXl2atJSMJJrZAbfvhazZ",
        language: "it-IT",
        limit: 5,
      },
      autocompleteOptions: {
        key: "5uNY3BSE9gSMXl2atJSMJJrZAbfvhazZ",
        language: "it-IT",
      },
    };

    var ttSearchBox = new tt.plugins.SearchBox(tt.services, options);

    var formElement = document.getElementById('create-form');

    var addressElement = document.getElementById('address');

    var titleElement = document.getElementById('title');

    // address = ttSearchBox.getSearchBoxHTML();
    // document.body.append(address);

    var searchBoxHTML = ttSearchBox.getSearchBoxHTML();

    document.getElementById("address").append(searchBoxHTML)
    // document.forms.namedItem("address").innerHTML = searchBoxHTML
    // formElement.append(searchBoxHTML);
</script>