Log Central
==========

A web application for presenting a collection of aggregated application log files. These
are exposed via JSON and ATOM.

Log Format
-------

Logs are aggregated with Facebook Scribe, and appear as files with json encoded rows.

Each row follows the following format:

<pre><code>
{
	level: 'TRACE | INFO | WARN | ERROR | FATAL'
	application: ... the application
	host: .. the host that the logs are from
	message: 'Error message text'
	timestamp: ... unix timestamp
	stacktrace: ... optional, see stack trace format
	context: ... optional, see context format
}
</code></pre>

The stacktrace key can be ommitted, but if provided should describe the calling stack before the log
message in the application in the following structure:

<pre><code>
[
	{
		file: .. the file the application was in
		line: .. the line number
		class: .. the name of the application class
		function: .. the function or method that the application was in
	},
	... repeated for each line of the trace
]
</code></pre>

Setup
-----------------

TODO
