package main

import "fmt"

func main() {
	arr := [][]int{
		{1, 3, 4, 2, 1, 5},
		{4, 1, 2, 0, 1},
	}

	for _, oneCase := range arr {
		fmt.Println(shellSort(oneCase))
	}
}

func shellSort(arr []int) []int {
	length := len(arr)

	if length <= 1 {
		return arr
	}

	for gap := length >> 1; gap > 0; gap >>= 1 {
		for i := gap; i < length; i++ {
			cur := arr[i]

			j := i - gap
			for ; j >= 0 && arr[j] > cur; j -= gap {
				arr[j + gap] = arr[j]
			}

			arr[j + gap] = cur
		}
	}

	return arr
}
