/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package javaapplication1;

import java.util.Scanner;


/**
 *
 * @author Huzaifa
 */
public class JavaApplication1 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        
        Scanner sc= new Scanner(System.in);    //System.in is a standard input stream
        System.out.println("Total distance is 20m");
        int distance = getDistanceFromUser();
        /// Second argument is Rabbit max distance

        Example2Thread t1 = new Example2Thread("Turtle", distance);
        Example2Thread t2 = new Example2Thread("Rabbit", distance);
        System.out.println("Starting Race");
        t1.start();
        t2.start();
        System.out.println("Other Execution as Normal");
        
        // TODO code application logic here
    }
    
    static int getDistanceFromUser(){
        System.out.print("Enter turtoise max distance in meteres and divisible by 5: ");
        Scanner sc= new Scanner(System.in);
        int distance= sc.nextInt();
        if(distance%5==0) {
            return distance;
        }else{
            return getDistanceFromUser();
        }
    }

}
