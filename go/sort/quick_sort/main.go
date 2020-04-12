package main

import (
	"fmt"
)

func main() {
	arr := [][]int{
		{2, 6, 1, 0, 9},
		{9, 1, 4, 1, 3, 2, 8},
	}

	for _, oneCase := range arr {
		fmt.Println(quickSearch(oneCase))
	}
}

func quickSearch(arr []int) []int {
	length := len(arr)
	if length <= 1 {
		return arr
	}

	pivot := arr[0]
	var less = make([]int, 0)
	var greater = make([]int, 0)

	for _, cur := range arr[1:] {
		if cur < pivot {
			less = append(less, cur)
		} else {
			greater = append(greater, cur)
		}
	}

	less = append(quickSearch(less), pivot)

	return append(less, quickSearch(greater)...)
}
