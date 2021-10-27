function task1() {
	let max = 20;
	let elementNum = parseInt(document.getElementById("textbox").value);
	let array = [];
	for (let i = 0; i < elementNum; i++) {
		array[i] = Math.floor(Math.random() * max);
	}
	let div = document.getElementById('output');
	div.innerHTML = array;

	moveToStart(array);
	div.innerHTML += ` (${array})`;

	selectionSort(array);
	div.innerHTML += "<br>" + array;
}

function moveToStart(array) {
	let smallestIndex = indexOfSmallest(array);
	let smallestNum = array[smallestIndex];
	array.splice(smallestIndex, 1);
	elementNum = array.length;
	for(let i = 0; i < elementNum; i++) {
		array[elementNum - i] = array[elementNum - i - 1];
	}
	array[0] = smallestNum;
}

function indexOfSmallest(a) {
	var lowest = 0;
	for (var i = 1; i < a.length; i++) {
		if (a[i] < a[lowest]) lowest = i;
	}
	return lowest;
}

function selectionSort(inputArr) {
	let n = inputArr.length;
	for (let i = 0; i < n; i++) {
		let min = i;
		for (let j = i + 1; j < n; j++) {
			if (inputArr[j] < inputArr[min]) {
				min = j;
			}
		}
		if (min != i) {
			let tmp = inputArr[i];
			inputArr[i] = inputArr[min];
			inputArr[min] = tmp;
		}
	}
	return inputArr;
}
