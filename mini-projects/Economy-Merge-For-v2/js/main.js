let suggestions = [];
const autocompleteList = document.getElementById("autocomplete-list");

function categories(element)
{
    const query = element.innerText.trim().toLowerCase();
    autocompleteList.innerHTML = "";

    const filteredSuggestions = suggestions.filter(item => item.toLowerCase().includes(query));

    if (query) {

        filteredSuggestions.forEach(suggestion => {
            const suggestionElement = document.createElement("div");
            suggestionElement.classList.add("autocomplete-suggestion");
            suggestionElement.innerText = suggestion;

            suggestionElement.addEventListener("click", () => {
                element.innerText = suggestion;
                autocompleteList.innerHTML = "";  
            });

            autocompleteList.appendChild(suggestionElement);
        });
        
        const rect = element.getBoundingClientRect();
        autocompleteList.style.top = `${rect.bottom + window.scrollY}px`;
        autocompleteList.style.left = `${rect.left + window.scrollX}px`;
        autocompleteList.style.display = "block";
    } else {
        autocompleteList.style.display = "none";
    }

    document.addEventListener("click", function(event) {
        if (!element.contains(event.target) && !autocompleteList.contains(event.target)) {
            autocompleteList.innerHTML = "";  
        }
    });
}

async function list()
{
    let response = await fetch("./endpoints/getAllList.php");
    const json = await response.json();
    
    let tab = document.getElementById('tab');
    
    let lastName = '';

    await json.forEach(element => {
        let tr = document.createElement('tr');

        let td = document.createElement('td');
        td.innerText = element.date;
        tr.append(td);

        td = document.createElement('td');
        td.innerText = element.name_bill;
        td.setAttribute('contenteditable',true);
        td.setAttribute('id','name_bill_'+element.id);
        tr.append(td);

        td = document.createElement('td');
        td.innerText = element.name_ec;
        td.setAttribute('contenteditable',true);
        td.classList.add('name_ec');
        td.setAttribute('id','name_ec_'+element.id);
        td.addEventListener('input', function() {
            if(this.innerText.length >= 2) {
                categories(this)
            }
        });
        if(lastName == element.name_ec && element.name_ec != ''){
            td.style.backgroundColor = 'tomato';
        }
        lastName = element.name_ec;
        tr.append(td);

        td = document.createElement('td');
        td.innerText = element.place;
        td.setAttribute('contenteditable',true);
        td.setAttribute('id','name_place_'+element.id);
        tr.append(td);

        td = document.createElement('td');
        td.innerText = element.fromEC;
        tr.append(td);

        td = document.createElement('td');
        td.innerText = element.typ;
        tr.append(td);

        td = document.createElement('td');
        td.innerText = element.cost;
        tr.append(td);

        td = document.createElement('td');
        let button = document.createElement('button');
        button.innerText = 'SAVE';
        button.setAttribute('data-id',element.id);

        button.addEventListener('click',async function() {
            await update(this);
        });

        td.append(button);
        tr.append(td);

        tab.append(tr);
    });



}

async function update(element)
{
    let id = element.getAttribute('data-id');
    let value = document.getElementById('name_ec_'+id).innerText;
    let bill = document.getElementById('name_bill_'+id).innerText;
    let place = document.getElementById('name_place_'+id).innerText;

    let response = await fetch("./endpoints/updateRow.php?id="+id+"&name="+value+"&bill="+bill+"&place="+place);

    // only for new categories
    setCategories();

}

async function setCategories() {
    suggestions = [];
    let categoryList = await fetch("./endpoints/getCategories.php");
    const json = await categoryList.json();

    json.forEach(element => {
        suggestions.push(element.category);
    });
}

document.addEventListener("DOMContentLoaded", function() {
    list();
    setCategories();
});