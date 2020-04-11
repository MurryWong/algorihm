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
		fmt.Println(bubbleSort(oneCase[:]))
	}
}

func bubbleSort(arr []int) []int {
	length := len(arr)
	changed := false

	for i := length - 1; i >= 0; i-- {
		for j := 0; j < i; j++ {
			if arr[j] > arr[j+1] {
				arr[j], arr[j+1] = arr[j+1], arr[j]
				changed = true
			}
		}

		if !changed {
			fmt.Print("数组未改变: ")
			break
		}
	}

	return arr
}
