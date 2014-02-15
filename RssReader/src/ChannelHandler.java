import java.net.MalformedURLException;
import java.net.URL;
import java.util.ArrayList;

import org.xml.sax.Attributes;
import org.xml.sax.SAXException;
import org.xml.sax.helpers.DefaultHandler;

public class ChannelHandler extends DefaultHandler{

    private ArrayList<Channel> alChannels;
    private Channel channel;
    private String reading;
    private ArrayList<Item> alItems;
    private Item item;
    private Enclosure enclosure;
    private Image image;
    
    public ChannelHandler(){
        super();
    }

    @Override
    public void startElement(String uri, String localName, String qName,
            Attributes attributes) throws SAXException {

        if(qName.equals("rss")){
                alChannels = new ArrayList<>();
        }
        else if(qName.equals("channel")){
            channel = new Channel();
        }
        else if(qName.equals("item")){
            item = new Item();
        }
        else if(qName.equals("enclosure")){

            enclosure = new Enclosure();
            enclosure.setType(attributes.getValue("type"));
            try {
                enclosure.setUrl(new URL(attributes.getValue("url")));
            } catch (MalformedURLException e) {
                // TODO Auto-generated catch block
                e.printStackTrace();
            }

            enclosure.setLength(Integer.parseInt(attributes.getValue("length")));

        }

    }

    @Override
    public void endElement(String uri, String localName, String qName)
            throws SAXException {

    	if(qName.equals("channel")){
            channel.setAlItems(alItems);
            alChannels.add(channel);
            alItems = null;
        }
        if(qName.equals("title")){

            if(alItems == null){
                channel.setTitle(reading);
                alItems = new ArrayList<>();
            }
            else if(item != null) {
            		item.setTitle(reading);
            }

        }
        else if(qName.equals("item")){

            if(alItems != null){
                alItems.add(item);
                item = null;
            }

        }
        else if(qName.equals("description")){
        	if(item != null)
        		item.setDescription(reading);
        }
        else if(qName.equals("pubDate")){
        	if(item != null)
        		item.setPubDate(reading);
        }
        else if(qName.equals("author")){
        	if(item != null)
        		item.setAuthor(reading);
        }
        else if(qName.equals("link")){
        	if(item != null)
        		item.setLink(reading);
        }
        else if(qName.equals("enclosure")){
            if (item!=null)
        	item.setEnclosure(enclosure);
        }
        else if(qName.equals("image")){
            if (item!=null)
        	item.setImage(image);
        }

    }

    @Override
    public void characters(char[] ch, int start, int length)
            throws SAXException {
        reading = new String(ch, start, length);
    }

    public ArrayList<Channel> getAlChannels() {
        return alChannels;
    }


}