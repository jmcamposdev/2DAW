/**
 * Class to manage the User Table
 * @property {String} #tableId - The id of the table
 * @property {HTMLElement} #tableElement - The table element
 * @property {HTMLElement} #tableTbody - The table body element
 * @property {HTMLElement} #selectedRow - The selected row
 * @method addRow - Add a new row to the table
 * @method setRowsEvent - Set the event of the rows
 * @method setSelectedRow - Set the selected row
 * @method getSelectedRow - Get the selected row
 * @method updateRow - Update a row
 * @method removeRow - Remove a row
 * @method getUserData - Get the data of the row
 * @throws {Error} - If the table id is not found
 */
export default class UserTable {
    #tableId
    #tableElement
    #tableTbody
    #selectedRow
    #rowsCallback;

    /**
     * Create the Table Object to manage the Table
     * @param tableId The id of the Table
     */
    constructor(tableId) {
        // Set the properties
        this.#tableId = tableId;
        this.#selectedRow = null;
        this.#tableElement = document.getElementById(this.#tableId);
        // If the table element is null throw an error
        if (this.#tableElement === null) {
            throw Error("Don't exits any table with the id provided")
        }
        // Get the table body
        this.#tableTbody = this.#tableElement.querySelector("tbody");
    }

    /**
     * Add the row to the table
     * @param {String} firstName The first Name of the User
     * @param {String} lastName The last Name of the User
     * @param {String|Number} age The age of the user
     */
    addRow({firstName, lastName, age}) {
        // Created the Table Row
        const row = document.createElement("tr");

        // Created the FirstNameCell
        const firstNameCell = document.createElement("td")
        firstNameCell.setAttribute("data-type", "firstName");
        firstNameCell.textContent = firstName;

        // Created the LastNameCell
        const lastNameCell = document.createElement("td")
        lastNameCell.setAttribute("data-type", "lastName");
        lastNameCell.textContent = lastName;

        // Created the LastNameCell
        const ageCell = document.createElement("td")
        ageCell.setAttribute("data-type", "age");
        ageCell.textContent = age;

        // Append all the cells to the row
        row.appendChild(firstNameCell);
        row.appendChild(lastNameCell);
        row.appendChild(ageCell);

        // Append the row if there is a selected row insert the new row after the selected row
        if (this.#selectedRow) {
            this.#tableTbody.insertBefore(row, this.#selectedRow.nextSibling)
        } else { // If there is no selected row append the row to the table body
            this.#tableTbody.appendChild(row);
        }

        // Add click event
        this.setRowsEvent(this.#rowsCallback)

        // Set selected row the current created
        this.setSelectedRow(row);
    }

    /**
     * Set the event of the rows 
     * @param {Function} callback - The callback function to execute when the row is clicked
     */
    setRowsEvent(callback) {
        // Set the callback function
        this.#rowsCallback = callback;
        // Get all the rows
        const allRows = this.#tableTbody.querySelectorAll("tr");
        // Set the event to all the rows
        allRows.forEach(row => {
            row.addEventListener("click", callback)
        })
    }

    /**
     * Set the row as selected
     * @param {HTMLElement} rowElement - The row element to set as selected
     */
    setSelectedRow(rowElement) {
        // Remove the pass selected Row
        const currentSelectedRow = this.#tableTbody.querySelector(".selectedRow")
        if (currentSelectedRow) {
            currentSelectedRow.classList.remove("selectedRow");
        }
        // Set the new selected row
        rowElement.classList.add("selectedRow");
        // Set the selected row
        this.#selectedRow = rowElement;
    }

    /**
     * Get the selected row
     * @returns {HTMLElement} - The selected row
     */
    getSelectedRow() {
        return this.#selectedRow;
    }

    /**
     * Update the row with the data passed as parameter using destructuring
     * @param {HTMLElement} rowElement - The row element to update
     * @param {Object} param1 - The data to update 
     */
    updateRow(rowElement, {firstName, lastName, age}) {
        this.addRow({firstName, lastName, age}) // Add a new row after the selected row
        rowElement.remove(); // Remove the pass selected row
    }

    /**
     * Remove the row passed as parameter
     * @param {HTMLElement} rowElement - The row element to remove
     */
    removeRow(rowElement) {
        rowElement.remove(); // Remove the row
        this.#selectedRow = null; // Set the selected row to null
    }

    /**
     * Get the data of the row
     * @param {HTMLElement} rowElement - The row element to get the data
     * @returns {Object} - The data of the row
     */
    getUserData(rowElement) {
        // Get the td content convert to a objet using the data-type
        const rowContent = {};
        rowElement.querySelectorAll("td").forEach(td => {
            const type = td.getAttribute("data-type");
            rowContent[type] = td.textContent;
        });
        return rowContent;
    }
}

