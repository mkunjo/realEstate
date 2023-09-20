# realEstate
MySQLi Integration: Employed the MySQLi extension in PHP to establish secure database connections, execute prepared statements, and retrieve data, optimizing for performance and security.

Input Sanitization: Implemented rigorous data validation techniques using PHP's filter functions, safeguarding against SQL injection and other potential vulnerabilities from user-input data.

Dynamic SQL Table Creation: Crafted SQL queries in PHP to programmatically create and validate database tables, utilizing IF NOT EXISTS clauses to ensure idempotency and structural integrity.

Decimal Data Precision: Used DECIMAL data type in MySQL, manipulated through PHP, to accurately handle and represent property prices, ensuring financial accuracy down to the cent.

Conditional Data Checks: Integrated PHP's isset() function to handle optional form inputs like property amenities, enabling flexibility in user submissions without sacrificing data integrity.

Real-time Data Rendering: Leveraged PHP loops and associative arrays to dynamically iterate over database results, rendering property cards on the frontend without hardcoded limitations.

Automated Financial Computations: Devised a PHP logic layer to automatically compute property tax values using floating-point arithmetic, ensuring real-time updates based on current property prices.

