# Americor's PHP Developer Test Assignment

This test assignment is designed to evaluate candidates' coding and problem-solving skills.

### Task

As a candidate for a PHP developer position, your task is a code refactoring operation for an existing codebase of a growing project. The project involves a multitude of 'event types' and 'objects' which present a growing complexity - a key challenge to tackle.
Specifically, your task is to streamline this codebase in a way that optimizes performance, and at the same time keeps the maintainability of the codebase intact.
Continue on this task keeping in mind the potential scaling of the project, considering the event types could grow beyond 150 with an average addition of 2 every month, and the objects could exceed a count of 30.

Specific areas to refactor:
- **History Feed Output:** Pay special attention to refactoring the code area dealing with the output of the history feed.
- **Export Functionalities:** The efficiency and performance of the data exporting functions should also be a primary focus during the refactoring process.

The task does not require the code to be fully functional. Instead, our primary interest is in understanding your approach and strategy for addressing such a challenge, as well as the concepts and methodologies you employ to tackle them.

### Evaluation Criteria

When reviewing your solution, we will focus on the following aspects:

- **OOP Understanding**: Your grasp of Object-Oriented Programming concepts.
- **Design Patterns**: Your ability to effectively utilize design patterns in your solution.
- **Code Separation**: Your skill in segregating code logically for better readability and maintainability.
- **Yii 2 Framework Knowledge**: Your understanding and application of the Yii 2 framework.
- **Problem Identification**: Your ability to identify and prioritize problems within the code.
- **Maintenance & Development**: How your approach facilitates future maintenance and development of the project.
- **Large Data Set Export**: Your solution for efficiently handling and exporting large data sets.

### Code Refactoring Process

1. **Repository Management**: Import the provided code into your git repository. Please ensure not to fork the original code.
2. **Refactoring Process**:
   - Create a new branch in your repository specifically for the task.
   - Focus on refactoring the history feed output and the data export functionality.
3. **Pull Request**:
   - Once refactoring is complete, initiate a pull request from your refactoring branch to the master branch of your repository.
   - In the pull request, detail the changes made and explain the reasoning behind each change.
4. **Submission**: Submit the link to your pull request for our review.

### How to run the project

The project is built using the Yii 2 framework. To run the project, follow the steps below:

1. Clone the repository to your local machine.

2. Run docker-compose to start the project:

   ```bash
   docker-compose up --build -d
   ```

3. Connect to the PHP container:

   ```bash
   docker exec -it americor-app bash
   ```

4. Install the project dependencies:

   ```bash
   composer install
   ```

5. Run the migrations to create the database tables:

   ```bash
   php yii migrate
   ```

6. Access the project in your browser at `http://localhost:8000`.

### Conclusion

This test assignment is an opportunity to demonstrate your technical skills and problem-solving abilities. We look forward to reviewing your solutions. Good luck!