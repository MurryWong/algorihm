package main

import "fmt"

func main() {
	arr := [][]int{
		{1},
		{2, 1},
		{1, 4, 3},
		{1, 2, 3, 4},
		{1, 3, 4, 2, 5, 7},
	}

	for _, oneCase := range arr {
		fmt.Println(selectSort(oneCase[:]))
	}
}

func selectSort(arr []int) []int {
	length := len(arr)

	for i := 0; i < length-1; i++ {
		min := i
		for j := i + 1; j < length; j++ {
			if arr[j] < arr[min] {
				min = j
			}
		}

		arr[i], arr[min] = arr[min], arr[i]
	}

	return arr
}
