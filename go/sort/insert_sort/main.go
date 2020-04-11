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

	for i := 1; i <= length-1; i++ {
		cur := arr[i]
		j := i - 1
		for j >= 0 && arr[j] > cur {
			arr[j+1] = arr[j]
			j--
		}

		arr[j+1] = cur
	}

	return arr
}
