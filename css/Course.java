package cecs277Final1AnswersStudentScores;
/**
 * The Course class is the list of valid courses that the students can receive a grade on.  Courses from 
 * other departments are, of course (get it, course, ...) possible, but not necessary for this to work.
 * @author	David Brown
 * @date	05/04/2020
 */
public enum Course {
	CECS_277("CECS", 277), CECS_323("CECS", 323), CECS_341("CECS", 341), CECS_274("CECS", 274), CECS_275("CECS", 275); 

	/** The department name offering the course.  This could have been an enumeration as well, but I got lazy. */
	private	String Department;
	/** The course number, which is only unique within a department. */
	private int courseNumber;
	
	/**
	 * Build a course.
	 * @param	Department		The name of the department offering the course.
	 * @param	courseNumber	The number of the course.
	 */
	private Course (String Department, int courseNumber) {
		this.Department = Department;
		this.courseNumber = courseNumber;
	}
	
	/**
	 * Produce a String representation of the course.
	 * @return	The String representation of the course.
	 */
	public String toString () { return "Course- Department: " + this.Department + " number: " + this.courseNumber; }
	
}
