        let array1 = [];
        let sum;
        function create_arr() {
            length = document.getElementById("n").value;
            for (i = 0; i<length; i++) {
                array1[i] = Math.floor(Math.random() * 100);
            }
        }

            function find_sum(array) {
                let sum;
                let max = array[0];
                for (let i = 0; i < array.length; i++) {
                    if (array[i]>max){
                        max = array[i];
                    }
                }
                let min = array[0];
                    for (let i = 0; i < array.length; i++) {
                        if (array[i]<min){
                            min = array[i];
                        }
                    }
                sum = max + min;
                return sum;
            }

            function quick_sort(arr) {
                if (arr.length < 2) return arr;
                let pivot = arr[0];
                const left = [];
                const right = [];
    
                for (let i = 1; i < arr.length; i++) {
                    if (pivot > arr[i]) {
                        left.push(arr[i]);
                    } else {
                        right.push(arr[i]);
                    }
                }
                return quick_sort(left).concat(pivot, quick_sort(right));
            }

            function print_result() {
                create_arr();
                sum = find_sum(array1);
                document.getElementById("in_arr").innerHTML = array1;
                document.getElementById("sum").innerHTML = sum;
                document.getElementById("out_arr").innerHTML = quick_sort(array1);
                document.getElementById("length").innerHTML = array1.length;
            }