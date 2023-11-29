<script>
  // Inserisco le opzioni del construttore di SearchBox
    var options = {
      // Opzioni di ricerca
        searchOptions: {
          key: "5uNY3BSE9gSMXl2atJSMJJrZAbfvhazZ",
          language: "it-IT",
          limit: 5,
        },
        // Autocomplete
        autocompleteOptions: {
          key: "5uNY3BSE9gSMXl2atJSMJJrZAbfvhazZ",
          language: "it-IT",
        },
      }
      // Elemento SearchBox
      var ttSearchBox = new tt.plugins.SearchBox(tt.services, options)
      // SearchBox in HTML
      var searchBoxHTML = ttSearchBox.getSearchBoxHTML()
      // Prendo un elemento 
      let addressElement = document.getElementById('address-element')
      // inserisco il searchBox HTML dentro l'elemento selezionato
      addressElement.append(searchBoxHTML)

      // Chiamo l'evento tomtom.searchbox.resultselected
      ttSearchBox.on("tomtom.searchbox.resultselected", function (data) {

        // console.log(data)

        // Prendo l'input nascosto con ID address 
        let address = document.getElementById('address');

        // Inserisco il valore dell'indirizzo dall'oggetto data in una variabile
        let addressVal = data.data.result.address.freeformAddress

        // Inserisco il valore dell'indirizzo dentro il valore dell'input nascosto 
        address.value = addressVal;

})
</script>