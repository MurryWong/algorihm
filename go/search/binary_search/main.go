package main

import "fmt"

func main() {
	arr := [][]int{
		{1},
		{1, 2},
		{1, 2, 3},
		{1, 3, 4, 4, 5},
	}

	key := 3

	for _, oneCase := range arr {
		fmt.Println(binarySearch(oneCase, key))
		//fmt.Println(binarySearch2(oneCase, key, 0, len(oneCase)-1))
	}
}

func binarySearch(arr []int, key int) int {
	left, right := 0, len(arr)-1

	for left <= right {
		mid := ((right - left) >> 1) + left

		if arr[mid] == key {
			return mid
		} else if arr[mid] > key {
			right = mid - 1
		} else {
			left = mid + 1
		}
	}

	return -1
}

func binarySearch2(arr []int, key, left, right int) int {
	if left > right {
		return -1
	}

	mid := ((right - left) >> 1) + left

	if arr[mid] == key {
		return mid
	} else if arr[mid] > key {
		return binarySearch2(arr, key, left, mid-1)
	}

	return binarySearch2(arr, key, mid+1, right)
}
