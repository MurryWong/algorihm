package main

import "fmt"

func main() {
	arr := [][]int{
		{1, 3, 4, 2, 1, 5},
		{4, 1, 2, 0, 1},
	}

	for _, oneCase := range arr {
		fmt.Println(mergeSort(oneCase))
	}
}

func mergeSort(arr []int) []int {
	length := len(arr)
	if length <= 1 {
		return arr
	}

	half := (length - 1) >> 1
	left := mergeSort(arr[:half+1])
	right := mergeSort(arr[half+1:])

	return merge(left, right)
}

func merge(left, right []int) []int {
	reg := make([]int, 0)

	var first int
	for len(left) > 0 && len(right) > 0 {
		if left[0] < right[0] {
			first, left = left[0], left[1:]
			reg = append(reg, first)
		} else {
			first, right = right[0], right[1:]
			reg = append(reg, first)
		}
	}

	return append(append(reg, left...), right...)
}
