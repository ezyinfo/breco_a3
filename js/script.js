// Declare variables
let fromInput;
let toInput;
let fromList;
let toList;


function getSitesList(input, list) {
    // Get input
    const inputValue = input.value.trim();

    if (inputValue.length === 0) {
        list.innerHTML = '';
        return;
    }

    // Get the list form service
    fetch(`get_sites.php?query=${inputValue}`)
        .then(response => response.json())
        .then(data => {
            // Erase the current list
            list.innerHTML = '';
            data.forEach(destination => {
                const listItem = document.createElement('li');
                listItem.textContent = destination.location;
                list.appendChild(listItem);

                // 
                listItem.addEventListener('click', function () {
                    input.value = destination.location;
                    list.innerHTML = '';
                });
            });
        })
        .catch(error => {
            console.error('Error fetching autocomplete data:', error);
        });

}

function initLocationAutoComplet() {
    fromInput = document.getElementById('from-loc-input');
    toInput = document.getElementById('to-loc-input');

    fromList = document.getElementById('from-loc-list');
    toList = document.getElementById('to-loc-list');

    // On every input change, get the new list
    if (fromInput != null && fromList != null) {
        fromInput.addEventListener('input', () => {
            getSitesList(fromInput, fromList);
        });
    } // else: There is a problem

    // Same for 'to Location'
    if (toInput != null && toList != null) {
        toInput.addEventListener('input', () => {
            getSitesList(toInput, toList);
        });
    } // else: There is a problem

}


document.addEventListener('DOMContentLoaded', initLocationAutoComplet);
