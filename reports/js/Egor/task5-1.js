let arrayA = [];
let minOdd;
let maxOdd;
let minEven;
let maxEven;

function createArray() {
    arrayA.length = document.getElementById("arrayLength").value;
    for (let i = 0; i < arrayA.length; i++) {
        arrayA[i] = getRandomInt();
    }
}

function getRandomInt() {
    return Math.floor(Math.random() * 100);
}

function result(){
    createArray();
    let oddArray = [];
    let evenArray = [];
    for (let i = 0; i < arrayA.length; i++) {
        if (arrayA[i]%2===0){
            evenArray.push(arrayA[i])
            maxEven = findMax(evenArray);
            minEven = findMin(evenArray);
        }
        else {
            oddArray.push(arrayA[i])
            maxOdd = findMax(oddArray);
            minOdd = findMin(oddArray);

        }
    }
    document.getElementById("array").innerHTML = arrayA;
    document.getElementById("sortedArray").innerHTML = selectionSort(arrayA);
    document.getElementById("maxEven").innerHTML = maxEven;
    document.getElementById("maxOdd").innerHTML = maxOdd;
    document.getElementById("minEven").innerHTML = minEven;
    document.getElementById("minOdd").innerHTML = minOdd;
}

function findMax(array){
    let max = array[0];
    for (let i = 0; i < array.length; i++) {
        if (array[i]>max){
            max = array[i];
        }
    }
    return max;
}

function findMin(array){
    let min = array[0];
    for (let i = 0; i < array.length; i++) {
        if (array[i]<min){
            min = array[i];
        }
    }
    return min;
}

function selectionSort(arr) {
    for (let i = 0, l = arr.length, k = l - 1; i < k; i++) {
        let indexMin = i;
        for (let j = i + 1; j < l; j++) {
            if (arr[indexMin] < arr[j]) {
                indexMin = j;
            }
        }
        if (indexMin !== i) {
            [arr[i], arr[indexMin]] = [arr[indexMin], arr[i]];
        }
    }
    return arr;
}