import java.io.File;
import java.io.IOException;
import java.net.URL;
import java.util.ArrayList;

import javax.xml.parsers.ParserConfigurationException;
import javax.xml.parsers.SAXParser;
import javax.xml.parsers.SAXParserFactory;

import org.w3c.dom.Document;
import org.xml.sax.SAXException;

public final class XMLManager {


    public static ArrayList<Channel> getAlChannels(){
        ArrayList<Channel> alChannels = null;
        SAXParserFactory factory = SAXParserFactory.newInstance();
        try {
            SAXParser parser = factory.newSAXParser();
            //File file = new File("C:\\rss\\huffpost02152014.xml");
            //File file = new File("C:\\rss\\bbc02152014.xml");
            //File file = new File("C:\\rss\\sfglnews02152014.xml");
            //File file = new File("C:\\rss\\blade02152014.xml");
            //File file = new File("C:\\rss\\gaypatriot02152014.xml");
            //File file = new File("C:\\rss\\outsports02152014.xml");
            File file = new File("C:\\rss\\tmz02152014.xml");
            
            ChannelHandler channelHandler = new ChannelHandler();
            parser.parse(file, channelHandler);
            
            alChannels = channelHandler.getAlChannels();
        } catch (ParserConfigurationException e) {
            // TODO Auto-generated catch block
            e.printStackTrace();
        } catch (SAXException e) {
            // TODO Auto-generated catch block
            e.printStackTrace();
        } catch (IOException e) {
            // TODO Auto-generated catch block
            e.printStackTrace();
        }
        return alChannels;
    }

}