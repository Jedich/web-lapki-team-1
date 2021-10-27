
function createInputArray() {
    let array = []
    array.length = document.getElementById("arrayLength").value;
    for (let i = 0; i < array.length; i++) {
        array[i] = getRandomInt();
    }
    return array
}

function createOutputArray(arr) {
    let array = []
    let max = getMaxOfArray(arr)
    array.length = arr.length;
    for (let i = 0; i < array.length; i++) {
        array[i] = arr[i]*max
    }
    return array
}

function getRandomInt() {
    return Math.floor(Math.random() * 10);
}

function result(){
    let a1 = createInputArray();
    let a2 = createOutputArray(a1);
    document.getElementById("outputArr").innerHTML = a2;
    let a3 = insertionSort(a2);

    document.getElementById("inputArr").innerHTML = a1;

    document.getElementById("sortedArr").innerHTML = a3;

}

function getMaxOfArray(numArray) {
    return Math.max.apply(null, numArray);
}


function insertionSort(inputArr) {
    let n = inputArr.length;
    for (let i = 1; i < n; i++) {
        // Choosing the first element in our unsorted subarray
        let current = inputArr[i];
        // The last element of our sorted subarray
        let j = i-1;
        while ((j > -1) && (current < inputArr[j])) {
            inputArr[j+1] = inputArr[j];
            j--;
        }
        inputArr[j+1] = current;
    }
    return inputArr;
}