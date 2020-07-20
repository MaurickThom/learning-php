package main

import (
	"fmt"
	"time"
)

func main() {
	firstTime := float64(time.Now().UnixNano())

	for i := 0; i < 1000000000; i++ {
		if i%100000000 == 0 {
			fmt.Println(i)
		}
	}
	lastTime := float64(time.Now().UnixNano())
	fmt.Printf("Elapsed time : %f sec\n", (lastTime-firstTime)/1000000000)
}
