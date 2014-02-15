import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;
import java.util.Date;

import org.w3c.dom.CharacterData;
import org.w3c.dom.Element;
import org.w3c.dom.Node;

public class DbService {

	private Connection conn;
	private ResultSet rs;

	static final String JDBC_DRIVER = "com.mysql.jdbc.Driver";
	static final String DB_URL = "jdbc:mysql://localhost/blazedb";

	// Database credentials
	static final String USER = "root";
	static final String PASS = "admin";

	public void write(ArrayList<Channel> list) {
		Connection conn = null;
		Statement stmt = null;
		try {
			// STEP 2: Register JDBC driver
			Class.forName("com.mysql.jdbc.Driver");

			// STEP 3: Open a connection
			System.out.println("Connecting to database...");
			conn = DriverManager.getConnection(DB_URL, USER, PASS);
			// System.out.println (">noded="+nodes.getLength());
			// STEP 4: Execute a query
			Enclosure enclosure = null;
			for (Channel channel : list) {
				for (Item i : channel.getAlItems()) {

					enclosure = i.getEnclosure();
					if (enclosure==null) i.setEnclosure(new Enclosure());
					if (i.getAuthor()==null) i.setAuthor("");
					stmt = conn.createStatement();
					StringBuffer sql = new StringBuffer();
					sql.append(" INSERT INTO ARTICLE ( article_url, category, post_date, headline,creation_date, description,type,archived_flag, author, photo_url, article_source) ");
					sql.append(" VALUES ( '" + i.getLink() + "','Sports','"+i.getPubDate()+"','"
							+ i.getTitle().replace("'", "''") + "','"
							+ this.getEpoch() + "','"+i.getDescription().replace("'", "''")+"','national','N','"
							+ i.getAuthor().replace("'", "''") + "','" + i.getEnclosure().getUrl()
							+ "','"+channel.getTitle().replace("'", "''")+"');");
					int rows = stmt.executeUpdate(sql.toString());
				}
			}
			// STEP 6: Clean-up environment
			stmt.close();
			conn.close();
		} catch (SQLException se) {
			// Handle errors for JDBC
			se.printStackTrace();
		} catch (Exception e) {
			// Handle errors for Class.forName
			e.printStackTrace();
		} finally {
			// finally block used to close resources
			try {
				if (stmt != null)
					stmt.close();
			} catch (SQLException se2) {
			}// nothing we can do
			try {
				if (conn != null)
					conn.close();
			} catch (SQLException se) {
				se.printStackTrace();
			}// end finally try
		}// end try
		System.out.println("Goodbye!");
	}// end main

	private String getCharacterDataFromElement(Element e) {
		try {
			Node child = e.getFirstChild();
			if (child instanceof CharacterData) {
				CharacterData cd = (CharacterData) child;
				return cd.getData();
			}
		} catch (Exception ex) {

		}
		return "";
	} // private String getCharacterDataFromElement

	protected float getFloat(String value) {
		if (value != null && !value.equals(""))
			return Float.parseFloat(value);
		else
			return 0;
	}

	protected String getElementValue(Element parent, String label) {
		return getCharacterDataFromElement((Element) parent
				.getElementsByTagName(label).item(0));
	}

	private long getEpoch() {
		long epoch;
		Date date = new java.util.Date();
		epoch = date.getTime();
		return epoch;
	}
}// end FirstExample

